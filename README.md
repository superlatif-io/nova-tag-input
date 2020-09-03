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
Tags::make(__("Tags"), 'tags')
    ->help("Press ENTER to add tag")
    ->placeholder("Add a new tag")
    ->allowEditTags(true)
    ->addOnKeys([13, ':', ';', ',']) // 13 = Enter key
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
| Parameter                    | Description                                                              | Type    | Default    |
| ---------------------------- | ------------------------------------------------------------------------ | ------- | ---------- |
| autocompleteItems            | Array of strings used for autocompletion                                 | Array   | -          |
| addOnKeys                    | Set of characters triggering tag insertion                               | Array   | [13]       |
| separators                   | Defines characters which split text into tags (useful when copy-pasting) | Array   | [';']      |
| placeholder                  | Hint displayed when the field is empty or after a list of existing tags  | String  | -          |
| addFromPaste                 | Tags can be created from pasted text                                     | Boolean | true       |
| addOnBlur                    | Tag is created when field loses focus                                    | Boolean | true       |
| addOnlyFromAutocomplete      | Only allow tag creation from the autocompleteItems array                 | Boolean | false      |
| allowEditTags                | Allow inline tag edition                                                 | Boolean | false      |
| autocompleteAlwaysOpen       | Autocomplete list remains open                                           | Boolean | false      |
| autocompleteFilterDuplicates | Removes duplicates from autocomplete list                                | Boolean | true       |
| autocompleteMinLength        | The minimum text that must be entered before autocomplete                | Boolean | 1          |
| avoidAddingDuplicates        | Prevent duplicated tags                                                  | Boolean | true       |
| deleteOnBackspace            | Delete tags using backspace                                              | Boolean | true       |
| disabled                     | Disable the field                                                        | Boolean | false      |
| maxTags                      | Max number of tags                                                       | Boolean | -          |
