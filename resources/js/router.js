import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter);

// コンポーネントをインポート
import ExampleComponent from './components/ExampleComponent.vue';
import HelloWorldComponent from './components/HelloWorldComponent.vue';

export default new VueRouter({
    // モードの設定
    mode: 'history',
    routes: [
        {
            // routeのパス設定
            path: '/ExampleComponent',
            // 名前付きルートを設定したい場合付与
            name: 'ExampleComponent',
            // コンポーネントの指定
            component: ExampleComponent
        },
        {
            path: '/Hello',
            name: 'HelloWorldComponent',
            component: HelloWorldComponent
        }
    ]
});