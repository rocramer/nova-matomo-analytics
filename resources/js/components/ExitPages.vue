<template>
    <loading-card :loading="loading" class="px-6 py-4 h-auto">
        <div class="flex mb-4">

            <h3 class="mr-3 text-base text-80 font-bold">{{ card.title }}</h3>

            <select
                    v-if="ranges.length > 0"
                    @change="handleChange"
                    class="ml-auto min-w-24 h-6 text-xs no-appearance bg-40"
            >
                <option
                        v-for="option in ranges"
                        :key="option.value"
                        :value="option.value"
                        :selected="option.value == selectedRangeKey"
                >
                    {{ option.label }}
                </option>
            </select>
        </div>
        <table cellpadding="0" cellspacing="0" class="table w-full">
            <thead>
            <tr>
                <th class="text-left">{{ __('URL') }}</th>
                <th class="text-center">{{ __('Clicks') }}</th>
                <th class="text-center">{{ __('Unique Clicks') }}</th>
            </tr>
            </thead>
            <tbody>

            <tr v-if="pages.length === 0">
                <td class="text-center" colspan="3">
                    {{ __('No data found.') }}
                </td>
            </tr>

            <tr v-for="page in pages">
                <td>{{ page.label }}</td>
                <td class="text-center">{{ page.nb_hits }}</td>
                <td class="text-center">{{ page.nb_visits }}</td>
            </tr>
            </tbody>
        </table>
    </loading-card>
</template>
<script>
    import _ from 'lodash'

    export default {
        name: 'ExitPages',

        props: {
            card: {
                type: Object,
                required: true,
            },
        },

        data() {
            return {
                pages: [],
                loading: true,
                selectedRangeKey: null,
            }
        },

        created() {
            if (this.hasRanges) {
                this.selectedRangeKey = this.ranges[0].value
            }
        },

        mounted() {
            this.getRequest(this.selectedRangeKey)
        },

        computed: {
            hasRanges() {
                return this.ranges.length > 0
            },

            ranges: function () {
                return _.map(this.card.ranges, (val, key) => {
                    return {label: val, value: key}
                });
            }
        },

        methods: {
            handleChange(event) {
                this.selectedRangeKey = event.target.value
                this.getRequest(this.selectedRangeKey)

            },

            getRequest(range) {
                this.loading = true

                Nova.request().get('/nova-vendor/matomo-analytics/exit-pages/' + range).then(response => {
                    this.pages = response.data
                });

                this.loading = false
            },
        },
    }
</script>