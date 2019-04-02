# Web-Debug PHP Library

This is official PHP core-library with server-side implementation
of https://web-debug.dev/

You should use it for all another level1 bundles/modules for 
another frameworks and cms.

## install

```bash
$ composer require web-debug/core
```

Support of scheme versions:

| Version | supported? |
| ------- | ---------- |
| 1 | yes |

## How to use

```php
use WebDebug\Builders\Events\EventLog;
use WebDebug\Builders\Types\TypeTagMultipart;
use WebDebug\Profiler;

// use any psr-6/psr-16 cache for persistent storage
$cache = new Symfony\Component\Cache\Simple\FilesystemCache('cache', 60, 'cache');

// make new profiler storage object
$profiler = new Profiler(
    version: Profiler::VERSION_1, 
    storage: $cache, 
    isProduction: false
);

// create some events
$log = new EventLog('Hello world');
$log->context = [
    'something' => 123
];
$log->tags->add(new TypeTagMultipart('name', 'value_for_filter'));
$log->tags->add(new TypeTagMultipart('component', 'kernel'));

// add events to scheme
$profiler->addEvent($log);
$profiler->addEvent($log = new EventLog('Another message'));
$profiler->addEvent($log = new EventLog('And another'));

// save generated json to storage
$uuid = $profiler->push(); // bdb01adb-895b-4a8b-b1b3-bbd5aca237fe
$json = $profiler->pop($uuid); // json for HTTP response
```

This will generate valid scheme described here:
https://web-debug.dev/docs/scheme/

```json
{
   "id":"bdb01adb-895b-4a8b-b1b3-bbd5aca237fe",
   "version":1,
   "events":[
      {
         "type":"log",
         "payload":{
            "message":"Hello world",
            "context":"{\"something\":123}"
         },
         "tags":[
            "name:value_for_filter",
            "component:kernel"
         ],
         "importance":1,
         "time":1554234913359,
         "nested":[]
      },
      {
         "type":"log",
         "payload":{
            "message":"Another message"
         },
         "tags":[],
         "importance":1,
         "time":1554234913447,
         "nested":[]
      },
      {
         "type":"log",
         "payload":{
            "message":"And another"
         },
         "tags":[],
         "importance":1,
         "time":1554234913506,
         "nested":[]
      }
   ]
}
```

See list of available events here:

https://web-debug.dev/docs/scheme/events.html

### How to get headers for HTTP Transport

https://web-debug.dev/docs/specification/transport/headers-request.html

This transport require two headers:

```text
X-Http-Debug-Id: ef95a542-25a3-4f71-a0e9-640c92f43813
X-Http-Debug-Api: /_profile/?id=
```

```php
$profiler = new Profiler(..);
$xHttpDebugId = $profiler->uuid; // ef95a542-25a3-4f71-a0e9-640c92f43813
$xHttpDebugApi = '<your api endpoint>';
```
 