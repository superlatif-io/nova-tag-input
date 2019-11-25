<?php

namespace Superlatif\NovaTagInput;

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
            $model->{$attribute} = json_decode($request[$requestAttribute]);
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
        return $this->withMeta(['autocompleteItems' => $items]);
    }

}
