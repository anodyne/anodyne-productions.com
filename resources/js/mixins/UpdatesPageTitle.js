export default {
    watch: {
        title (title) {
            this.updatePageTitle(title);
        }
    },

    mounted () {
        this.updatePageTitle(this.title);
    },

    methods: {
        updatePageTitle (title) {
            document.title = title ? `${title} | Anodyne Productions` : `Anodyne Productions`;
        }
    }
};
