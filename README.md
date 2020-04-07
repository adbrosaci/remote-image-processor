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
    service:
        name: Adbros\RemoteImageProcessor\Services\ThumborService
        args: ['https://thumbor.url']
    aliases:
        detail: '400x255'
```

## Usage

```html
<a href="{$imageUrl|image}">
    <img src="{$imageUrl|image:detail}" alt="">
</a>
```