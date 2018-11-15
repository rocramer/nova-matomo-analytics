import CustomTrendMetric from './components/CustomTrendMetric'
import TrendMetric from './components/Base/TrendMetric'


Nova.booting((Vue, router) => {

    Vue.component('trend-metric', TrendMetric);
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