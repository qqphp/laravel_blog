<?php

namespace Ichynul\RowTable\Field;

use Encore\Admin\Form\Field;
use Illuminate\Support\Collection;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorTool;

class CollectValidator
{
    /**
     * @var Collection
     */
    protected $fields;

    /**
     * Get fields of this builder.
     *
     * @return Collection
     */
    public function getFields()
    {
        return $this->fields;
    }

    /**
     * @param Field $field
     *
     * @return $this
     */
    public function pushField(Field $field)
    {
        if (!$this->fields) {
            $this->fields = new Collection();
        }

        $this->fields->push($field);

        return $this;
    }

    /**
     * Get specify field.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function field($name)
    {
        if (!$this->fields) {
            return null;
        }

        return $this->fields->first(function (Field $field) use ($name) {
            return $field->column() == $name;
        });
    }

    /**
     * Get validation messages.
     *
     * @param array $input
     *
     * @return MessageBag|bool
     */
    public function validationMessages($input, $errorKey, $label = '')
    {
        $rules =  $messages = $labels = [];

        $this->fields->each(function ($field) use (&$rules, &$messages, &$labels,  $input) {
            if (!$validator = $field->getValidator($input)) {
                return;
            }

            if (($validator instanceof Validator) && !$validator->passes()) {

                $err = $validator->errors()->first($field->getErrorKey());

                $rules[$field->getErrorKey()] = array_get($validator->getRules(), $field->getErrorKey());

                $messages[$field->getErrorKey() . '.required'] = $err;

                $labels[$field->getErrorKey()] = $field->label();
            }
        });

        if (empty($messages)) {
            return false;
        }

        $rules[$errorKey] = 'required';
        $messages[$errorKey . '.required'] = implode(' ', array_values($messages));
        $labels[$errorKey] = $label ?: $errorKey;

        return ValidatorTool::make($input, $rules, $messages, $labels);
    }
}
