<template>
    <form-field-group :field-id="fieldId" :label="label">
        <input
            :id="fieldId"
            type="email"
            class="appearance-none w-full focus:outline-none focus:text-grey-darker"
            :name="name"
            :value="value"
        >
    </form-field-group>
</template>

<script>
export default {
    props: [],

    data () {
        return {

        }
    }
}
</script>
