<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    |  following language lines contain  default error messages used by
    |  validator class. Some of se rules have multiple versions such
    | as  size rules. Feel free to tweak each of se messages here.
    |
    */
    'phone' => ':attribute bukan no hp yang valid',
    'accepted' => ':attribute harus diterima.',
    'active_url' => ':attribute bukan URL yang valid.',
    'after' => ':attribute harus berupa tanggal setelah :date.',
    'after_or_equal' => ':attribute harus berupa tanggal setelah atau sama date: tanggal.',
    'alpha' => ':attribute hanya dapat berisi huruf.',
    'alpha_dash' => ':attribute hanya dapat berisi huruf, angka, tanda hubung dan garis bawah.',
    'alpha_num' => ':attribute hanya dapat berisi huruf dan angka.',
    'array' => ':attribute hanya dapat berisi huruf dan angka.',
    'before' => ':attribute harus tanggal sebelum :date.',
    'before_or_equal' => ':attribute harus tanggal sebelum atau sama dengan :date.',
    'between' => [
        'numeric' => ':attribute harus antara :min dan :max.',
        'file' => ':attribute harus antara :min dan :max kilobyte.',
        'string' => ':attribute harus antara :min dan :max karakteer.',
        'array' => ':attribute harus memiliki antara :min dan :max.',
    ],
    'boolean' => ':attribute atribut harus benar atau salah.',
    'confirmed' => ' :attribute confirmation does not match.',
    'date' => ':attribute bukan tanggal yang valid.',
    'date_equals' => ' :attribute must be a date equal to :date.',
    'date_format' => ' :attribute does not match  format :format.',
    'different' => ' :attribute and :or must be different.',
    'digits' => ':attribute harus :digits digit.',
    'digits_between' => ':attribute harus antara :min dan :max digits.',
    'dimensions' => ' :attribute has invalid image dimensions.',
    'distinct' => ' :attribute field has a duplicate value.',
    'email' => ':attribute Harus alamat e-mail yang valid.',
    'ends_with' => ' :attribute must end with one of  following: :values.',
    'exists' => ':attribute tidak benar.',
    'file' => ' :attribute must be a file.',
    'filled' => ' :attribute field must have a value.',
    'gt' => [
        'numeric' => ':attribute harus lebih besar dari :value.',
        'file' => ':attribute harus lebih besar dari :value kilobytes.',
        'string' => ':attribute harus lebih besar dari :value characters.',
        'array' => ':attribute harus lebih dari :value items.',
    ],
    'gte' => [
        'numeric' => ':attribute harus lebih besar atau sama dengan :value.',
        'file' => ':attribute harus lebih besar atau sama dengan :value kilobytes.',
        'string' => ':attribute harus lebih besar atau sama dengan :value karakter.',
        'array' => ':attribute harus memiliki :value items atau lebih.',
    ],
    'image' => ':attribute harus berupa gambar.',
    'in' => ':attribute yang dipilih tidak valid.',
    'in_array' => ' :attribute field does not exist in :or.',
    'integer' => ':attribute harus berupa integer.',
    'ip' => ' :attribute must be a valid IP address.',
    'ipv4' => ' :attribute must be a valid IPv4 address.',
    'ipv6' => ' :attribute must be a valid IPv6 address.',
    'json' => ' :attribute must be a valid JSON string.',
    'lt' => [
        'numeric' => ':attribute harus lebih kecil dari :value.',
        'file' => ':attribute harus lebih kecil dari :value kilobytes.',
        'string' => ':attribute harus lebih kecil dari :value characters.',
        'array' => ':attribute harus lebih kecil dari :value items.',
    ],
    'lte' => [
        'numeric' => ':attribute harus lebih kecil atau sama :value.',
        'file' => ':attribute harus lebih kecil atau sama :value kilobytes.',
        'string' => ':attribute harus lebih kecil atau sama :value characters.',
        'array' => ':attribute tidak boleh lebih dari :value items.',
    ],
    'max' => [
        'numeric' => ':attribute tidak boleh lebih dari :max.',
        'file' => ':attribute tidak boleh lebih dari :max kilobytes.',
        'string' => ':attribute tidak boleh lebih dari :max characters.',
        'array' => ':attribute tidak boleh lebih dari :max items.',
    ],
    'mimes' => ':attribute harus berupa tipe: :values.',
    'mimetypes' => ' :attribute must be a file of type: :values.',
    'min' => [
        'numeric' => ':attribute harus kurang dari :min.',
        'file' => ':attribute tidak boleh lebih dari :min kilobytes.',
        'string' => ' :attribute tidak boleh lebih dari :min characters.',
        'array' => ' :attribute tidak boleh lebih dari :min items.',
    ],
    'not_in' => ':attribute tidak valid.',
    'not_regex' => ' :attribute format is invalid.',
    'numeric' => ':attribute harus berupa nomor.',
    'password' => 'Password tidak valid.',
    'present' => ' :attribute field must be present.',
    'regex' => ' :attribute format is invalid.',
    'required' => ':attribute wajib diisi.',
    'required_if' => ':attribute wajib diisi ketika :or bernilai :value.',
    'required_unless' => ' :attribute field is required unless :or is in :values.',
    'required_with' => ' :attribute field is required when :values is present.',
    'required_with_all' => ' :attribute field is required when :values are present.',
    'required_without' => ' :attribute field is required when :values is not present.',
    'required_without_all' => ' :attribute field is required when none of :values are present.',
    'same' => ' :attribute and :or must match.',
    'size' => [
        'numeric' => ' :attribute must be :size.',
        'file' => ' :attribute must be :size kilobytes.',
        'string' => ' :attribute must be :size characters.',
        'array' => ' :attribute must contain :size items.',
    ],
    'starts_with' => ' :attribute must start with one of  following: :values.',
    'string' => ' :attribute must be a string.',
    'timezone' => ' :attribute must be a valid zone.',
    'unique' => ':attribute telah dipakai.',
    'uploaded' => ' :attribute failed to upload.',
    'url' => ' :attribute format is invalid.',
    'uuid' => ' :attribute must be a valid UUID.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using 
    | convention "attribute.rule" to name  lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    |  following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
