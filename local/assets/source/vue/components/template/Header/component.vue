<template>
    <header>
        <v-btn flat icon color="#ffffff" @click="drawer=false" v-if="drawer" class="mobile-nav-close-btn">
            <v-icon>close</v-icon>
        </v-btn>
        <v-navigation-drawer
                v-model="drawer"
                temporary
                fixed
                width="280"
                height="150%"
        >
            <v-container class="mobile-nav-header">
                <v-layout wrap>
                    <v-flex xs4>
                        <v-img :src="parameters.IMG_LOGO_PERSONAL_CABINET" contain width="62" height="40"
                               class="mobile-nav-header-img"></v-img>
                    </v-flex>
                    <v-flex xs8>
                        <div v-if="userIsLogin" class="mobile-nav-header-text">
                            <a :href="parameters.LINK_TO_LK" v-html="parameters.TITLE_PERSONAL_CABINET"></a>
                            <br>
                            <span v-text="personName"></span>
                            <div class="count-score-mobile" v-if="cartScore" v-text="cartScore"></div>
                        </div>
                        <div v-else class="mobile-nav-header-text" v-html="parameters.TITLE_PERSONAL_CABINET"></div>
                    </v-flex>
                    <v-flex xs12 pt-2>
                        <v-btn v-if="!userIsLogin" class="btn--sosedi small blue" @click="modalLogin = true" block>
                            ВОЙТИ
                        </v-btn>
                        <v-btn v-else class="btn--sosedi small blue" href="/?logout=yes" block>
                            {{by ? 'ВЫЙСЦІ' : 'ВЫЙТИ'}}
                        </v-btn>
                        <v-dialog
                                v-model="modalLogin"
                                width="500"
                        >
                            <v-card id="mobileLoginForm">
                                <v-btn
                                        flat
                                        icon
                                        class="btn-close-login"
                                        @click="modalLogin = false"
                                        dark
                                >
                                    <v-icon>close</v-icon>
                                </v-btn>
                            </v-card>
                        </v-dialog>
                    </v-flex>
                </v-layout>
            </v-container>
            <v-list class="pt-2 mobile-nav" dense>

                <v-list-group
                        v-for="(item, i) in menu"
                        :key="i"
                >
                    <v-list-tile slot="activator" class="mobile-nav-item-with-icon">
                        <v-list-tile-action class="v-list-tile-action-img">
                            <div class="left-nav-icon">
                                <img :src="item.icon" alt="">
                            </div>
                        </v-list-tile-action>
                        <v-list-tile-title class="mobile-nav-text-icon">{{item.text}}</v-list-tile-title>
                    </v-list-tile>

                    <v-list-tile
                            v-for="(subItem, j) in item.subMenu"
                            :key="j"
                            class="mobile-subNav"
                    >
                        <v-list-tile-title class="mobile-subNav-text"
                                           v-if="subItem.onlyUpdateMap"
                                           @click="editMap(subItem)">
                            <a :href="subItem.href">{{subItem.text}}</a>
                        </v-list-tile-title>
                        <v-list-tile-title v-else class="mobile-subNav-text">
                            <a :href="subItem.href">{{subItem.text}}</a>
                        </v-list-tile-title>
                    </v-list-tile>


                </v-list-group>
                <div class="mobile-nav-item-without-icon">
                    <v-list-tile v-for="(item, i) in menuBottom">
                        <v-list-tile-title>
                            <a :href="item.href" v-text="item.text" class="mobile-nav-text"></a>
                        </v-list-tile-title>
                    </v-list-tile>
                </div>
                <div class="mobile-nav-searc">
                    <v-form :action="'/search?q=' + searchText" @submit.prevent="goToSearch()"
                            @keyup.enter="goToSearch()">
                        <input
                                v-model="searchText"
                                type="search"
                                class="style--sosedi-input"
                                :placeholder="parameters.PLACEHOLDER_SEARCH"
                                autocomplete="on">
                    </v-form>
                </div>
            </v-list>
        </v-navigation-drawer>
        <transition name="slide-fade">
            <div class="header-search" @click.prevent.stop='' v-if="search">
                <v-container wrap row>
                    <v-layout>
                        <v-flex md3 lg2>
                            <a href="#" class="d-block header-search-logo"><img
                                    src="/local/assets/images/logo-sosedi-small.svg" alt=""></a>
                        </v-flex>
                        <v-flex md9 lg10>
                            <v-form :action="'/search?q=' + searchText" @submit.prevent="goToSearch()"
                                    @keyup.enter="goToSearch()" class="header-search-form">
                                <input
                                        v-model="searchText"
                                        type="text"
                                        class="header-search-input"
                                        :placeholder="parameters.PLACEHOLDER_SEARCH">
                            </v-form>
                            <v-btn class="header-search-closeBtn" flat icon large @click="search = false"
                                   color="#ffffff">
                                <v-icon>close</v-icon>
                            </v-btn>
                        </v-flex>
                    </v-layout>
                </v-container>
            </div>
        </transition>
        <v-snackbar
                v-model="snackbar"
                top
        >
            Для вызова поиска нажмите Ctrl + Shift + F
            <v-btn
                    color="blue"
                    @click="snackbar = false"
                    flat
                    icon
            >
                <v-icon>close</v-icon>
            </v-btn>
        </v-snackbar>
        <v-snackbar
                v-model="controlAlertMessage"
                bottom
                left
                auto-height
                :timeout="3333"
                vertical
                :color="alertMessage.success?'#6ce26c':'#ff6868'"
        >
            <template v-if="typeof alertMessage.message == 'string' ">
                {{ alertMessage.message }}
            </template>
            <template v-else>
                <div v-for="(item, key) in alertMessage.message" :key="key">
                    {{item.name}} : <span v-html="item.value"></span>
                </div>
            </template>
            <v-btn
                    color="#ffffff"
                    flat
                    dark
                    @click="controlAlertMessage = false"
            >
                Закрыть
            </v-btn>
        </v-snackbar>
        <v-container grid-list-md text-xs-cente class="header-container">
            <v-layout row wrap>
                <LeftNav :menu="menu" :menuBottom="menuBottom" :parameters="parameters"/>
                <v-flex xs2 hidden-lg-and-up text-left>
                    <v-toolbar-side-icon @click.stop="drawer = !drawer" class="mobile-btn-nav"></v-toolbar-side-icon>
                </v-flex>
                <v-flex xs8 hidden-lg-and-up position-relative text-center class="main-logo">
                    <a :href="parameters.LINK_LOGO"><img :src="parameters.IMG_LOGO" alt="" class="header-logo"></a>
                </v-flex>
                <v-flex lg3 hidden-md-and-down offset-lg-2 text-left>
                    <span v-if="parameters.SHOW_TAGLINE === 'Y'" class="header-link"
                          v-html="parameters.TEXT_TAGLINE"></span>
                </v-flex>
                <v-flex xs2 lg7 text-right>
                    <div class="header-my-count-kupilka hidden-md-and-down">
                        <img :src="parameters.IMG_LOGO_PERSONAL_CABINET" alt="">
                        <div class="kupilka-text-login" v-if="userIsLogin">
                            <div class="d-inline-block position-relative block-name-user">
                                <div class="count-score-in-title" v-if="cartScore">{{cartScore}}</div>
                                <a class="top_text" :href="parameters.LINK_TO_LK"
                                   v-html="parameters.TITLE_PERSONAL_CABINET"></a> <br>
                                <span v-text="personName"></span>
                            </div>
                            <v-btn class="ml-2 btn btn-blue btn--sosedi small blue header-login-kupilka"
                                   href="/?logout=yes">
                                {{by ? 'ВЫЙСЦІ' : 'Выйти'}}
                            </v-btn>
                        </div>
                        <div
                                class="kupilka-text"
                                v-else
                                v-html="parameters.TITLE_PERSONAL_CABINET"
                                @click="showLogin = !showLogin"
                        >
                        </div>
                        <div v-if="!userIsLogin" class="popup-login-container"></div>
                        <v-menu
                                v-if="!userIsLogin"
                                v-model="showLogin"
                                allow-overflow
                                offset-y
                                bottom
                                nudge-bottom="30"
                                nudge-left="126"
                                min-width="320"
                                max-width="320"
                                :close-on-content-click="false"
                                transition="slide-y-transition"
                                attach=".popup-login-container"
                        >
                            <v-btn slot="activator" class="btn btn-blue btn--sosedi small blue header-login-kupilka">
                                Войти
                            </v-btn>
                            <v-card color="#007DC6" class="popup-login">
                                <v-container>
                                    <v-layout wrap>
                                        <v-form @submit.prevent="submitLogin()" class="w-100">
                                            <v-flex xs12 mb-3 pt-3>
                                                <input
                                                        placeholder="E-mail/телефон"
                                                        class="style--sosedi-input round big"
                                                        v-model="loginForm.login"
                                                >
                                            </v-flex>
                                            <v-flex xs12 mb-3>
                                                <input
                                                        type="password"
                                                        placeholder="Пароль"
                                                        class="style--sosedi-input round big"
                                                        v-model="loginForm.password"
                                                >
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-layout>
                                                    <v-flex xs7>
                                                        <v-checkbox
                                                                v-model="rememberMe"
                                                                label="Запомнить меня"
                                                                color="#fff"
                                                                height="20"
                                                                class="style--sosedi-checkbox"
                                                                dark
                                                        ></v-checkbox>
                                                    </v-flex>
                                                    <v-flex xs5>
                                                        <a href="#" @click.prevent="showForgotPassword()">Забыли
                                                            пароль?</a>
                                                    </v-flex>
                                                </v-layout>
                                            </v-flex>
                                            <v-flex xs12>
                                                <v-btn
                                                        class="btn--sosedi big orange"
                                                        block
                                                        type="submit"
                                                >
                                                    ВОЙТИ
                                                </v-btn>
                                            </v-flex>
                                        </v-form>
                                        <v-flex xs12 text-center pt-2 pb-3>
                                            <a href="#" @click.prevent="showLogin = false, showRegistration = true"
                                               color="#ffffff">ЗАРЕГИСТРИРОВАТЬСЯ</a>
                                        </v-flex>
                                    </v-layout>
                                </v-container>
                            </v-card>
                        </v-menu>
                    </div>
                    <div class="header-list-buys">
                        <v-btn color="#007dc6" round outline
                               href="#"
                               @click.prevent="userIsLogin? goToPage('/personal/#list') : (showLogin = !showLogin, modalLogin = true)"
                        >
                            <img :src="parameters.ICON_SHOPPING_LIST" alt="">
                            <span class="hidden-md-and-down">{{parameters.TITLE_SHOPPING_LIST}}</span>
                            <span class="count-buys-in-btn" v-if="countInCard">{{countInCard}}</span>
                        </v-btn>
                    </div>
                    <a href="#" class="header-search-btn hidden-md-and-down" @click.prevent="search = true">
                        <img src="/local/assets/images/icons/ic-search.svg" alt="">
                    </a>
                </v-flex>
            </v-layout>
        </v-container>
        <Loading/>
        <v-dialog
                v-model="showRegistration"
                max-width="1000"
        >
            <Registration/>
        </v-dialog>
        <ForgotPassword/>
    </header>

</template>

<script src="./script.js"></script>

<style lang="scss" src="./styles.scss" scoped></style>
