<?php

namespace Ichynul\RowTable\Field;

interface Collect
{
    /**
     * Fill data to the fields.
     *
     * @param [array] $data
     * @return void
     */
    public function fillFields($data);

    /**
     * Get validator form fields.
     *
     * @param [array] $input
     * @return bool|Validator
     */
    public function validatFields($input);

    /**
     * Get fields of this.
     *
     * @return array
     */
    public function getFields();
}
