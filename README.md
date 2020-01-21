# Nova Tag Input Field

This plugin incorporate the [Vue Tags Input](https://github.com/JohMun/vue-tags-input) plugin by Johannes Munari into Laravel Nova by creating a new field type.

![Nova Tag Input](https://superlatif.io/packages/nova-tag-input/tags-input-nova.gif?1)

## Installing

Using Composer:
```
composer require superlatif/nova-tag-input
```

## Example

### Basic
```
use Superlatif\NovaTagInput\Tags;


Tags::make(__("Tags"), 'tags')
    ->help("Press ENTER to add tag")
    ->placeholder("Add a new tag")
    ->allowEditTags(true)
    ->addOnKeys([13 //enter, ':', ';', ','])
    ->autocompleteItems([
        'Arizona',
        'California',
        'Colorado',
        'Michigan',
        'New York',
        'Texas',
    ]),
```

### Autocomplete items from Eloquent
```
$tags = Tag::pluck('title')->get();
Tags::make(__("Tags"), 'tags')
    // ...
    ->autocompleteItems($tags)
    // ...
```

### Parameters
| Parameter            | Description                                                             | Type    |
| -------------------- | ----------------------------------------------------------------------- | ------- |
| placeholder          | Hint displayed when the field is empty or after a list of existing tags | String  |
| allowEditTags        | Allow inline tag edition                                                | Boolean |
| addOnKeys            | Set of characters triggering tag insertion                              | Array   |
| autocompleteItems    | Array of strings used for autocompletion                                | Array   |



