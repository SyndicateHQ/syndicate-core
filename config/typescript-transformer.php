<?php
use Spatie\LaravelData\Support\TypeScriptTransformer\DataTypeScriptTransformer;
use Spatie\LaravelData\Support\TypeScriptTransformer\DataTypeScriptCollector;

return [
    'transformers' => [
        DataTypeScriptTransformer::class,
    ],
    'collectors' => [
        DataTypeScriptCollector::class,
    ],
    'output_file' => resource_path('js/@types/generated.d.ts'),
];