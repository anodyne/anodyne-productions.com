<template>
	<div class="flex items-center">
		<svg viewBox="0 0 1083 1083" :class="logoClasses" xmlns="http://www.w3.org/2000/svg"><path d="M301.734 1027.16L379.5 838H677l28.092 219.85C653.478 1074.187 598.518 1083 541.5 1083c-86.092 0-167.491-20.091-239.766-55.84zM152.54 918.239C58.116 820.772 0 687.923 0 541.5 0 242.438 242.438 0 541.5 0S1083 242.438 1083 541.5c0 171.278-79.521 323.983-203.657 423.21L760.75 254.25c-2.5-30-30-53.75-61.25-53.75h-180c-31.25 0-57.5 16.25-68.75 46.25L152.54 918.239zM657 686.75H442l108.75-262.5c11.25-27.5 21.25-57.5 30-82.5H617c1.25 27.5 2.5 56.25 6.25 83.75L657 686.75z" fill="currentColor" fill-rule="evenodd"/></svg>

		<div :class="textClasses" v-if="withText">Anodyne</div>
	</div>
</template>

<script>
export default {
	props: {
		xl: { type: Boolean, default: false },
		lg: { type: Boolean, default: false },
		md: { type: Boolean, default: false },
		sm: { type: Boolean, default: false },
		withText: { type: Boolean, default: false },
	},

	computed: {
		logoClasses () {
			if (this.xl) {
				return 'h-16 w-16'
			}

			if (this.lg) {
				return 'h-12 w-12'
			}

			if (this.md) {
				return 'h-8 w-8'
			}

			if (this.sm) {
				return 'h-4 w-4'
			}

			return 'h-6 w-6'
		},

		textClasses () {
			if (this.lg) {
				return 'font-special text-4xl ml-3'
			}

			if (this.sm) {
				return 'font-special text-lg ml-1'
			}

			return 'font-special text-2xl ml-2'
		}
	}
}
</script>
