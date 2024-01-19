
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ $action }}" enctype="multipart/form-data">
                        @csrf
                        @method($method)

                        @foreach ($fields as $field)
                            <div class="mb-4">
                                <x-text-input :name="$field['name']" :label="$field['label']" :type="$field['type']" :value="old($field['name'], $field['value'])" />
                            </div>
                        @endforeach

                        <div class="mt-6">
                            <x-primary-button :submit="true">{{ $submitButtonLabel }}</x-primary-button>
                            <x-secondary-button :href="$cancelUrl">{{ $cancelButtonLabel }}</x-secondary-button>
                        </div>
                    </form>
                </div>
           
