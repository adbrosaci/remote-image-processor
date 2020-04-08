# Remote Image Processor

## Installation
```yaml
composer require adbros/remote-image-processor
```

## Configuration

```yaml
extensions:
    rip: Adbros\RemoteImageProcessor\DI\Extension

rip:
    service: Adbros\RemoteImageProcessor\Services\ThumborService('https://thumbor.url', 'securityKey')
    aliases:
        detail: '400x255'
```

## Usage

```html
<a href="{$imageUrl|image}">
    <img src="{$imageUrl|image:detail}" alt="">
</a>
```