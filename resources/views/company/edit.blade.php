<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Company') }}
        </h2>
    </x-slot>

    <!-- Your main content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <x-form
                    :action="route('companies.update', $company->id)"
                    :method="'PUT'"
                    :fields="[
                        [
                            'name' => 'name',
                            'label' => 'Company Name',
                            'type' => 'text',
                            'value' => old('name', $company->name),
                        ],
                        [
                            'name' => 'email',
                            'label' => 'Email',
                            'type' => 'email',
                            'value' => old('email', $company->email),
                        ],
                        [
                            'name' => 'website',
                            'label' => 'Website',
                            'type' => 'url',
                            'value' => old('website', $company->website),
                        ],
                        [
                            'name' => 'logo',
                            'label' => 'Logo',
                            'type' => 'file',
                            'attributes' => [
                                'accept' => 'image/jpeg, image/png, image/gif', // Specify accepted image types
                            ],
                            'value' => asset('storage/' . $company->logo), // Set the logo URL here
                        ],
                    ]"
                    :submitButtonLabel="'Update Company'"
                    :cancelUrl="route('companies.index')"
                    :cancelButtonLabel="'Cancel'"
                />
            </div>
        </div>
    </div>
</x-app-layout>
