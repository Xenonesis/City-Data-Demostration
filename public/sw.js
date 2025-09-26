const CACHE_NAME = 'city-project-v1.0.0';
const OFFLINE_URL = '/offline';

// Files to cache for offline functionality
const CACHE_URLS = [
  '/',
  '/cities',
  '/about',
  '/contact',
  '/states',
  '/languages',
  '/districts',
  '/offline',
  '/manifest.json',
  // CSS and JS files will be cached dynamically
];

// Install event - cache essential resources
self.addEventListener('install', event => {
  console.log('[SW] Install');
  event.waitUntil(
    caches.open(CACHE_NAME)
      .then(cache => {
        console.log('[SW] Caching app shell');
        return cache.addAll(CACHE_URLS);
      })
      .then(() => {
        console.log('[SW] Skip waiting');
        return self.skipWaiting();
      })
  );
});

// Activate event - clean up old caches
self.addEventListener('activate', event => {
  console.log('[SW] Activate');
  event.waitUntil(
    caches.keys()
      .then(cacheNames => {
        return Promise.all(
          cacheNames.map(cacheName => {
            if (cacheName !== CACHE_NAME) {
              console.log('[SW] Deleting old cache:', cacheName);
              return caches.delete(cacheName);
            }
          })
        );
      })
      .then(() => {
        console.log('[SW] Claiming clients');
        return self.clients.claim();
      })
  );
});

// Fetch event - serve from cache, fallback to network
self.addEventListener('fetch', event => {
  // Skip non-GET requests
  if (event.request.method !== 'GET') return;

  // Skip cross-origin requests
  if (!event.request.url.startsWith(self.location.origin)) return;

  event.respondWith(
    caches.match(event.request)
      .then(response => {
        // Return cached version if available
        if (response) {
          console.log('[SW] Serving from cache:', event.request.url);
          return response;
        }

        // Try to fetch from network
        return fetch(event.request)
          .then(response => {
            // Don't cache non-successful responses
            if (!response || response.status !== 200 || response.type !== 'basic') {
              return response;
            }

            // Clone the response for caching
            const responseToCache = response.clone();

            // Cache successful responses
            caches.open(CACHE_NAME)
              .then(cache => {
                // Only cache GET requests for same origin
                if (event.request.method === 'GET' && event.request.url.startsWith(self.location.origin)) {
                  console.log('[SW] Caching new resource:', event.request.url);
                  cache.put(event.request, responseToCache);
                }
              });

            return response;
          })
          .catch(() => {
            // Network failed, try to serve offline page for HTML requests
            if (event.request.destination === 'document') {
              return caches.match(OFFLINE_URL);
            }
            
            // For other resources, try to find a cached version
            return caches.match(event.request);
          });
      })
  );
});

// Background sync for form submissions when back online
self.addEventListener('sync', event => {
  console.log('[SW] Background sync:', event.tag);
  
  if (event.tag === 'contact-form') {
    event.waitUntil(
      // Handle contact form submission when back online
      handleContactFormSync()
    );
  }
});

// Push notification handling
self.addEventListener('push', event => {
  console.log('[SW] Push received');
  
  const options = {
    body: event.data ? event.data.text() : 'New update available!',
    icon: '/icons/icon-192x192.png',
    badge: '/icons/icon-72x72.png',
    vibrate: [200, 100, 200],
    data: {
      dateOfArrival: Date.now(),
      primaryKey: '1'
    },
    actions: [
      {
        action: 'explore',
        title: 'Explore Cities',
        icon: '/icons/icon-72x72.png'
      },
      {
        action: 'close',
        title: 'Close',
        icon: '/icons/icon-72x72.png'
      }
    ]
  };

  event.waitUntil(
    self.registration.showNotification('City Project', options)
  );
});

// Notification click handling
self.addEventListener('notificationclick', event => {
  console.log('[SW] Notification click received.');

  event.notification.close();

  if (event.action === 'explore') {
    event.waitUntil(
      clients.openWindow('/cities')
    );
  } else if (event.action === 'close') {
    // Just close the notification
  } else {
    // Default action - open the app
    event.waitUntil(
      clients.openWindow('/')
    );
  }
});

// Helper function for background sync
async function handleContactFormSync() {
  try {
    // Get pending form submissions from IndexedDB
    const pendingForms = await getPendingContactForms();
    
    for (const form of pendingForms) {
      try {
        await fetch('/contact', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json',
          },
          body: JSON.stringify(form.data)
        });
        
        // Remove from pending submissions
        await removePendingContactForm(form.id);
      } catch (error) {
        console.log('[SW] Failed to sync form:', error);
        // Keep in pending for next sync attempt
      }
    }
  } catch (error) {
    console.log('[SW] Background sync failed:', error);
  }
}

// IndexedDB helpers (simplified)
async function getPendingContactForms() {
  // Implementation would use IndexedDB to store/retrieve pending forms
  return [];
}

async function removePendingContactForm(id) {
  // Implementation would remove form from IndexedDB
  return true;
}