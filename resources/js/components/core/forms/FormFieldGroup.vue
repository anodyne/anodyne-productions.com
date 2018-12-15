<template>
    <div class="mb-6">
        <label :for="fieldId"  class="block mb-1 leading-normal text-xs text-grey-dark font-semibold uppercase tracking-wide">
            {{ label }}
        </label>
        <slot></slot>
    </div>
</template>

<script>
export default {
    props: {
        label: {
            type: String,
            default: ''
        },
        fieldId: {
            type: String,
            required: true
        }
    }
}
</script>
