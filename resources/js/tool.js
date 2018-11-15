import CustomTrendMetric from './components/CustomTrendMetric'

Nova.booting((Vue, router) => {

    Vue.component('custom-trend-metric', CustomTrendMetric);

    //
    // router.addRoutes([
    //     {
    //         name: 'matomo-analytics',
    //         path: '/matomo-analytics',
    //         component: require('./components/MatomoAnalyticsTool'),
    //     },
    // ]);

})