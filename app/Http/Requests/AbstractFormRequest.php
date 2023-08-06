<?php

declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractFormRequest extends FormRequest
{
    abstract public function authorize(): bool;

    /**
     * @return array<string, mixed>
     */
    abstract public function rules(): array;

    public function getAsInt(string $key): int
    {
        return (int)$this->get($key);
    }

    public function getAsString(string $key): string
    {
        return (string)$this->get($key);
    }

    /**
     * @return array<string, string>
     */
    public function messages(): array
    {
        return parent::messages();
    }
}
