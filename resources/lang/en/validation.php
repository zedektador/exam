<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted'             => 'The :attribute must be accepted.',
    'active_url'           => 'The :attribute is not a valid URL.',
    'after'                => 'Cannot set past schedule date.',
    'after_or_equal'       => 'The :attribute must be a date after or equal to :date.',
    'alpha'                => 'The :attribute may only contain letters.',
    'alpha_dash'           => 'The :attribute may only contain letters, numbers, and dashes.',
    'alpha_num'            => 'The :attribute may only contain letters and numbers.',
    'array'                => 'The :attribute must be an array.',
    'before'               => 'The :attribute must be a date before :date.',
    'before_or_equal'      => 'The :attribute must be a date before or equal to :date.',
    'between'              => [
        'numeric' => 'The :attribute must be between :min and :max.',
        'file'    => 'The :attribute must be between :min and :max kilobytes.',
        'string'  => 'The :attribute must be between :min and :max characters.',
        'array'   => 'The :attribute must have between :min and :max items.',
    ],
    'boolean'              => 'The :attribute field must be true or false.',
    'confirmed'            => ':Attribute must be confirmed.',
    'date'                 => 'The :attribute is not a valid date.',
    'date_format'          => 'The :attribute does not match the format :format.',
    'different'            => 'The :attribute and :other must be different.',
    'digits'               => 'The :attribute must be :digits digits.',
    'digits_between'       => 'The :attribute must be between :min and :max digits.',
    'dimensions'           => 'The :attribute has invalid image dimensions.',
    'distinct'             => 'The :attribute field has a duplicate value.',
    'email'                => 'The :attribute must be a valid email address.',
    'exists'               => 'The selected :attribute is invalid.',
    'file'                 => 'The :attribute must be a file.',
    'filled'               => 'The :attribute field must have a value.',
    'image'                => 'The :attribute must be an image.',
    'in'                   => 'The selected :attribute is invalid.',
    'in_array'             => 'The :attribute field does not exist in :other.',
    'integer'              => 'The :attribute must be an integer.',
    'ip'                   => 'The :attribute must be a valid IP address.',
    'ipv4'                 => 'The :attribute must be a valid IPv4 address.',
    'ipv6'                 => 'The :attribute must be a valid IPv6 address.',
    'json'                 => 'The :attribute must be a valid JSON string.',
    'max'                  => [
        'numeric' => 'The :attribute may not be greater than :max.',
        'file'    => 'The :attribute may not be greater than :max kilobytes.',
        'string'  => 'The :attribute may not be greater than :max characters.',
        'array'   => 'The :attribute may not have more than :max items.',
    ],
    'mimes'                => 'The :attribute must be a file of type: :values.',
    'mimetypes'            => 'The :attribute must be a file of type: :values.',
    'min'                  => [
        'numeric' => 'The :attribute must be at least :min.',
        'file'    => 'The :attribute must be at least :min kilobytes.',
        'string'  => 'The :attribute must be at least :min characters.',
        'array'   => 'The :attribute must have at least :min items.',
    ],
    'not_in'               => 'The selected :attribute is invalid.',
    'numeric'              => 'The :attribute must be a number.',
    'present'              => 'The :attribute field must be present.',
    'regex'                => 'The :attribute format is invalid.',
    'required'             => ':Attribute is required.',
    'required_if'          => 'The :attribute field is required when :other is :value.',
    'required_unless'      => 'The :attribute field is required unless :other is in :values.',
    'required_with'        => 'The :attribute field is required when :values is present.',
    'required_with_all'    => 'The :attribute field is required when :values is present.',
    'required_without'     => 'The :attribute field is required when :values is not present.',
    'required_without_all' => 'The :attribute field is required when none of :values are present.',
    'same'                 => 'The :attribute and :other must match.',
    'size'                 => [
        'numeric' => 'The :attribute must be :size.',
        'file'    => 'The :attribute must be :size kilobytes.',
        'string'  => 'The :attribute must be :size characters.',
        'array'   => 'The :attribute must contain :size items.',
    ],
    'string'               => 'The :attribute must be a string.',
    'timezone'             => 'The :attribute must be a valid zone.',
    'unique'               => 'The :attribute has already been taken.',
    'uploaded'             => 'The :attribute failed to upload.',
    'url'                  => 'The :attribute format is invalid.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'alpha_space_quote' => 'The :attribute may only contain letters, single quote and whitespace.',
    'mobile' => 'Invalid mobile number format',
    'rating_items' => ':Attribute items has missing [rate] or [phrase_uuid] keys.',
    'inused_category' => 'Some categories cannot be deleted. Please make sure there are no products affected.',
    'custom' => [
        'category_id' => [
            'required' => 'Category is Required'
        ],
        'stock' => [
            'max' => 'Invalid value. Maximum stock quantity is only :max.'
        ],
        'sku' => [
            'required' => 'SKU is required.',
            'unique' => 'SKU has already been taken.'
        ],
        'regular_price' => [
            'required' => ':Attribute is required.',
            'regex' => ':Attribute format is invalid.',
            'amount_between' => ':Attribute value is invalid.'
        ],
        'discount_type' => [
            'required_if' => 'The :attribute is required when the item is on sale.'
        ],
        'discount_value' => [
            'required_if' => 'The :attribute is required when the item is on sale.',
            'valid_discount' => 'Invalid amount.'
        ],
        'on_sale_from' => [
            'required_if' => 'The :attribute is required when the item is on sale.',
            'date_format' => 'The :attribute must be in yyyy-mm-dd hh:mm:ss format',
            'after_or_equal' => 'On sale start date must be after or equal :date.'
        ],
        'on_sale_to' => [
            'required_if' => 'The :attribute is required when the item is on sale.',
            'date_format' => 'The :attribute must be in yyyy-mm-dd hh:mm:ss format',
            'after_or_equal' => 'On sale end date must be after or equal :date.'
        ],
        'product_images.*.uuid' => [
            'required' => 'Product image uuid is required.',
            'required_if' => 'Product image\'s uuid is required when action is delete'
        ],
        'product_images.*.action' => [
            'required' => 'Product image\'s action is required.',
            'valid_image_action' => 'Product image\'s action value must be create or delete.',
        ],
        'product_images.*.image' => [
            'required' => 'Product image is required.',
            'base64image' => 'Product image must be in base64 format.',
            'required_if' => 'Product image is required when action is create.'
        ],
        'product_images' => [
            'filled' => ':Attribute must not be empty.',
            'array' => ':Attribute must be an array.'
        ],
        'product_variables.*.variable.variation_code' => [
            'required' => 'Variation code is required.'
        ],
        'product_variables.*.action' => [
            'required' => 'Action is required.',
            'valid_variable_action' => 'Action value must be create or update.',
        ],
        'product_variables.*.variable.stock' => [
            'required' => 'Stock code is required.',
            'min' => 'Stock value must be at least 1.',
            'max' => 'Invalid value. Maximum stock quantity is only :max.',
            'integer' => 'Stock must an integer.'
        ],
        'product_variables.*.variable.regular_price' => [
            'required' => 'Regular price is required.',
            'regex' => 'Regular price format is invalid.',
            'amount_between' => 'Regular price value is invalid.'
        ],
        'product_variables.*.variable.sku' => [
            'required' => 'SKU is required.',
            'valid_variable_sku_on_update' => 'SKU has already been taken.',
            'unique' => 'SKU has duplicate value.',
            'distinct' => 'SKU has duplicate value.'
        ],
        'product_variables.*.variable.currency' => [
            'required' => 'Currency is required.'
        ],
        'product_variables.*.variable.visibility' => [
            'required' => 'Visibility is required.',
            'boolean' => 'Visibility value must be true or false only.'
        ],
        'product_variables.*.variable.on_sale_from' => [
            'required' => 'On sale from is required.',
            'date_format' => 'On sale from must be in yyyy-mm-dd hh:mm:ss format.',
            'required_if' => 'On sale from is required when item is on sale.',
            'after_or_equal' => 'On sale start date must be after or equal :date.'
        ],
        'product_variables.*.variable.on_sale_to' => [
            'required' => 'On sale to is required.',
            'date_format' => 'On sale to must be in yyyy-mm-dd hh:mm:ss format.',
            'required_if' => 'On sale to is required when item is on sale.',
            'after_or_equal' => 'On sale end date must be after or equal :date.'
        ],
        'product_variables.*.variable.discount_type' => [
            'required' => 'Discount type is required.',
            'required_if' => 'Discount type is required.'
        ],
        'product_variables.*.variable.discount_value' => [
            'required' => 'Discount value is required.',
            'required_if' => 'Discount value is required.',
            'regex' => 'Discount value format is invalid.',
            'valid_discount_variable' => 'Invalid amount.'
        ],
        'product_attributes' => [
            'array' => ':Attribute must be an array.'
        ],
        'product_attributes.*.action' => [
            'required' => 'Attribute\'s action is required.',
            'valid_attribute_action' => 'Attribute\'s action value must be create or update.',
        ],
        'product_attributes.*.name' => [
            'required' => 'attribute name is required.',
        ],
        'product_attributes.*.uuid' => [
            'required' => 'uuid is required when action is update.',
        ],
        'product_attributes.*.variations' => [
            'array' => 'variations must be an array.',
            'required' => 'variations is required.'
        ],
        'product_attributes.*.variations.*.hash' => [
            'required' => 'variations hash is required.'
        ],
        'product_attributes.*.variations.*.name' => [
            'required' => 'Variations hash is required.'
        ],
        'product_attributes.*.variations.*.action' => [
            'required' => 'Variations action is required.',
            'valid_attribute_variation_action' => 'Variations action value must be create or update.'
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap attribute place-holders
    | with something more reader friendly such as E-Mail Address instead
    | of "email". This simply helps us make messages a little cleaner.
    |
    */

    'attributes' => [],

];
