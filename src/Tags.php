<?php

namespace Superlatif\NovaTagInput;

use Illuminate\Support\Arr;
use Laravel\Nova\Fields\Field;
use Laravel\Nova\Http\Requests\NovaRequest;

class Tags extends Field
{
    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'nova-tag-input';

    protected function fillAttributeFromRequest(NovaRequest $request, $requestAttribute, $model, $attribute)
    {
        if ($request->exists($requestAttribute)) {
            // Data to be stored
            $attributes = json_decode($request[$requestAttribute]);
            // Only get the value of the text key if it exists
            $tags = Arr::pluck($attributes, 'text');
            // Store the data
            $model->{$attribute} = $tags;
        }
    }

    public function placeholder($text)
    {
        return $this->withMeta(['placeholder' => $text]);
    }

    // Used to generate tags while typing
    public function addOnKeys(array $keys)
    {
        return $this->withMeta(['addOnKeys' => $keys]);
    }

    // Defines the characters which splits a text into different pieces, to generate tags out of this pieces.
    public function separators(array $separators)
    {
        return $this->withMeta(['separators' => $separators]);
    }

    // If it's true, the user can paste into the input element and vue-tags-input will create tags out of the incoming text.
    public function addFromPaste(bool $enable = true)
    {
        return $this->withMeta(['addFromPaste' => $enable]);
    }

    // If the input holds a value and loses the focus, a tag will be generated out of this value, if possible.
    public function addOnBlur(bool $enable = true)
    {
        return $this->withMeta(['addOnBlur' => $enable]);
    }

    // If it's true, the user can add tags only via the autocomplete layer.
    public function addOnlyFromAutocomplete(bool $enable = true)
    {
        return $this->withMeta(['addOnlyFromAutocomplete' => $enable]);
    }

    // Defines whether a tag is editable after creation or not.
    public function allowEditTags(bool $allow = true)
    {
        return $this->withMeta(['allowEditTags' => $allow]);
    }

    // If it's true, the autocomplete layer is always shown, regardless if an input or an autocomplete items exists.
    public function autocompleteAlwaysOpen(bool $open = true)
    {
        return $this->withMeta(['autocompleteAlwaysOpen' => $open]);
    }

    // Defines if duplicate autocomplete items are filtered out from the view or not.
    public function autocompleteFilterDuplicates(bool $filter = true)
    {
        return $this->withMeta(['autocompleteFilterDuplicates' => $filter]);
    }

    // The minimum character length which is required until the autocomplete layer is shown. If set to 0, then it'll be shown on focus.
    public function autocompleteMinLength(int $minLength = 1)
    {
        return $this->withMeta(['autocompleteMinLength' => $minLength]);
    }

    // If it's true, the user can't add or save a tag, if another exists, with the same text value.
    public function avoidAddingDuplicates(bool $avoidDuplicates = true)
    {
        return $this->withMeta(['avoidAddingDuplicates' => $avoidDuplicates]);
    }

    // Defines if it's possible to delete tags by pressing backspace.
    public function deleteOnBackspace(bool $enable = true)
    {
        return $this->withMeta(['deleteOnBackspace' => $enable]);
    }

    // Property to disable vue-tags-input.
    public function disabled(bool $disabled = true)
    {
        return $this->withMeta(['disabled' => $disabled]);
    }

    // The maximum amount the tags array is allowed to hold.
    public function maxTags(int $max)
    {
        return $this->withMeta(['maxTags' => $max]);
    }

    public function autocompleteItems(array $items)
    {
        /*
         * Convert the user's items to the required syntax
         */
        $entries = [];
        foreach ($items as $item) {
            $entries[] = ['text' => $item];
        }

        return $this->withMeta(['autocompleteItems' => $entries]);
    }

}
