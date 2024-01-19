<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Employee') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <x-form
                        :action="route('employees.store')"
                        :method="'POST'"
                        :fields="[
                            [
                                'name' => 'first_name',
                                'label' => 'First Name',
                                'type' => 'text',
                                'value' => old('first_name'),
                                'required' => true, 
                            ],
                            [
                                'name' => 'last_name',
                                'label' => 'Last Name',
                                'type' => 'text',
                                'value' => old('last_name'),
                                'required' => true, 
                            ],
                            [
                                'name' => 'email',
                                'label' => 'Email',
                                'type' => 'email',
                                'value' => old('email'),
                            ],
                            [
                                'name' => 'phone',
                                'label' => 'Phone Number',
                                'type' => 'tel',
                                'value' => old('phone'),
                            ],
                            [
                                'name' => 'company_id',
                                'label' => 'Company',
                                'type' => 'select',
                                'options' => $companies, 
                                'value' => old('company_id'),
                                'required' => true, 
                            ],
                        ]"
                        :submitButtonLabel="'Create Employee'"
                        :cancelUrl="route('employees.index')"
                        :cancelButtonLabel="'Cancel'"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
