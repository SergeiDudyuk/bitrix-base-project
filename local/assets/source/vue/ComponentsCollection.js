import Header from './components/template/Header/component.vue'
import Footer from './components/template/Footer/component.vue'

export const ComponentsCollection = {
  /* app components */
  Header: () => Promise.resolve(Header),
  Footer: () => Promise.resolve(Footer),

  LeftNav: () => import('./components/navs/LeftNav/component.vue' /* webpackChunkName: "LeftNav" */),
  Carousel: () => import('./components/common/Carousel/component.vue' /* webpackChunkName: "Carousel" */),
  ProductList: () => import('./components/common/ProductList/component.vue' /* webpackChunkName: "ProductList" */),
  BannerMain: () => import('./components/common/BannerMain/component.vue' /* webpackChunkName: "BannerMain" */),
  NewsMain: () => import('./components/common/NewsMain/component.vue' /* webpackChunkName: "NewsMain" */),
  SocialCount: () => import('./components/common/SocialCount/component.vue' /* webpackChunkName: "SocialCount" */),
  SearchRezult: () => import('./components/common/SearchRezult/component.vue' /* webpackChunkName: "SearchRezult" */),
  Map: () => import('./components/common/Map/component.vue' /* webpackChunkName: "Map" */),
  Page404: () => import('./components/common/Page404/component.vue' /* webpackChunkName: "Page404" */),
  Stock: () => import('./components/common/Stock/component.vue' /* webpackChunkName: "Stock" */),
  StockCard: () => import('./components/common/StockCard/component.vue' /* webpackChunkName: "StockCard" */),
  Sales: () => import('./components/common/Sales/component.vue' /* webpackChunkName: "Sales" */),
  Recipes: () => import('./components/common/Recipes/component.vue' /* webpackChunkName: "Recipes" */),
  Soups: () => import('./components/common/Soups/component.vue' /* webpackChunkName: "Soups" */),
  Pizza: () => import('./components/common/Pizza/component.vue' /* webpackChunkName: "Pizza" */),
  Today: () => import('./components/common/Today/component.vue' /* webpackChunkName: "Today" */),
  Trademarks: () => import('./components/common/Trademarks/component.vue' /* webpackChunkName: "Trademarks" */),
  TrademarksList: () => import('./components/common/TrademarksList/component.vue' /* webpackChunkName: "TrademarksList" */),
  Contacts: () => import('./components/common/Contacts/component.vue' /* webpackChunkName: "Contacts" */),
  Work: () => import('./components/common/Work/component.vue' /* webpackChunkName: "Work" */),
  Vacancii: () => import('./components/common/Vacancii/component.vue' /* webpackChunkName: "Vacancii" */),
  CooperationItem: () => import('./components/common/CooperationItem/component.vue' /* webpackChunkName: "CooperationItem" */),
  Cooperation: () => import('./components/common/Cooperation/component.vue' /* webpackChunkName: "Cooperation" */),
  Recipe: () => import('./components/common/Recipe/component.vue' /* webpackChunkName: "Recipe" */),
  AlertInfo: () => import('./components/common/AlertInfo/component.vue' /* webpackChunkName: "AlertInfo" */),
  FaqPage: () => import('./components/common/FaqPage/component.vue' /* webpackChunkName: "FaqPage" */),
  LK: () => import('./components/LK/Index/component.vue' /* webpackChunkName: "LK (SPA)" */)
}
