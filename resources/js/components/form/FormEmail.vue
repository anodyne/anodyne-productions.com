<template>
    <form-field
        :field-id="fieldId"
        :name="name"
        :label="label"
    >
        <div class="field-group">
            <div class="field-addon">
                <app-icon name="email" class="h-5 w-5 leading-0 text-grey-400"></app-icon>
            </div>

            <input
                :id="fieldId"
                type="email"
                class="field"
                :name="name"
                :value="value"
                @input="$emit('input', $event.target.value)"
            >
        </div>
    </form-field>
</template>

<script>
export default {
    name: 'FormEmail',

    props: {
        label: {
            type: String,
            default: ''
        },
        fieldId: {
            type: String,
            required: true
        },
        name: {
            type: String,
            required: true
        },
        value: {
            type: String,
            default: ''
        }
    }
};
</script>
