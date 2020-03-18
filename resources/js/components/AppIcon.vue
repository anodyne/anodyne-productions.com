<script>
import './icons';

export default {
    props: {
        name: {
            type: String,
            required: true
        },
        options: {
            type: Object,
            default: () => { return {}; }
        }
    },

    render (h) {
        return h(
            'svg-icon',
            {
                attrs: Object.assign({}, { 'v-cloak': '' }, this.options),
                props: {
                    name: this.name
                }
            },
            this.$slots.default
        );
    }
};
</script>
