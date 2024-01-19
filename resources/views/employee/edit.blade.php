<!-- resources/views/employee/edit.blade.php -->
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Employee') }}
        </h2>
    </x-slot>

    <!-- Your main content -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-form
                        :action="route('employees.update', $employee->id)"
                        :method="'PUT'"
                        :fields="[
                            [
                                'name' => 'first_name',
                                'label' => 'First Name',
                                'type' => 'text',
                                'value' => old('first_name', $employee->first_name),
                            ],
                            [
                                'name' => 'last_name',
                                'label' => 'Last Name',
                                'type' => 'text',
                                'value' => old('last_name', $employee->last_name),
                            ],
                            [
                                'name' => 'email',
                                'label' => 'Email',
                                'type' => 'email',
                                'value' => old('email', $employee->email),
                            ],
                            [
                                'name' => 'phone',
                                'label' => 'Phone Number',
                                'type' => 'tel',
                                'value' => old('phone', $employee->phone),
                            ],
                            [
                                'name' => 'company_id',
                                'label' => 'Company',
                                'type' => 'select',
                                'options' => $companies,
                                'value' => old('company_id', $employee->company_id),
                            ],
                        ]"
                        :submitButtonLabel="'Update Employee'"
                        :cancelUrl="route('employees.index')"
                        :cancelButtonLabel="'Cancel'"
                    />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
