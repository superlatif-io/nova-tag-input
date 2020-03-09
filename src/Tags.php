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

    public function placeholder(string $placeholder)
    {
        return $this->withMeta(['placeholder' => $placeholder]);
    }

    public function addOnKeys(array $keys)
    {
        return $this->withMeta(['addOnKeys' => $keys]);
    }

    public function allowEditTags(bool $allow = true)
    {
        return $this->withMeta(['allowEditTags' => $allow]);
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
