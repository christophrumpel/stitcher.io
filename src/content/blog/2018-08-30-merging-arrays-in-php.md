```php
$first = [
    'a',
    'b',
];

$second = [
    'c',
];
```

```php
array_merge($first, $second);

[
    'a',
    'b',
    'c',
]
```

```php
$first + $second;

[
    'a',
    'b',
]
```

```php
$second + $first;

[
    'c',
    'b',
]
```

```php
$first = [
    0 => 'a',
    1 => 'b',
];

$second = [
    0 => 'c',
];
```

```php
array_merge($first, $second, $third, /* ... */);
```
