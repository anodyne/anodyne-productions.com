<template>
    <base-layout :title="title">
        <slot></slot>
    </base-layout>
</template>

<script>
import HasPageTitle from '@/mixins/HasPageTitle';

export default {
    name: 'MarketingLayout',

    mixins: [HasPageTitle]
};
</script>
