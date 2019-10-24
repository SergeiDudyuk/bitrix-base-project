<template>
    <v-container id="footer">
        <v-layout wrap row pa-4 pa-md-0 class="footer-wrap">
            <v-flex md12 lg7 pr-4 pl-2 class="footer-wrap-card">
                <v-card v-if="parameters.SHOW_APP === 'Y'" color="#007DC6">
                    <v-container>
                        <v-layout wrap row>
                            <v-flex xs12 sm7 pl-4>
                                <img :src="parameters.LOGOS_APP[0]" alt="">
                                <img :src="parameters.LOGOS_APP[1]" alt="" class="ml-3">
                                <div class="footer-text-blue" v-html="parameters.DESCRIPTION_APP"></div>
                            </v-flex>
                            <v-flex xs12 sm5 class="footer-btns-download">
                                <v-btn v-for="count in parameters.COUNT_LINKS_INSTALL_APP" v-bind:class="{'mb-3': parameters.SETTINGS_INSTALL_APP.ADD_CLASS}" round outline color="#ffffff" block flat :href="parameters.SETTINGS_INSTALL_APP.LINKS[count-1]" target="_blank">
                                    <img :src="parameters.SETTINGS_INSTALL_APP.LOGOS[count-1]" alt="">
                                </v-btn>
                            </v-flex>
                        </v-layout>
                    </v-container>
                </v-card>

                <v-layout v-if="parameters.FIRST_BUTTON_SHOW === 'Y' || parameters.SECOND_BUTTON_SHOW === 'Y'" row wrap mt-2 px-3 class="footer-btns-part">
                    <v-flex v-if="parameters.FIRST_BUTTON_SHOW === 'Y'" xs12 sm6 pr-2>
                        <v-btn outline :href="parameters.FIRST_BUTTON_LINK" class="footer-btn" color="#2f2e2e" block>
                            <v-icon class="pr-2" color="#007DC6">{{parameters.FIRST_BUTTON_ICON}}</v-icon>
                            {{parameters.FIRST_BUTTON_TITLE}}
                        </v-btn>
                    </v-flex>
                    <v-flex v-if="parameters.SECOND_BUTTON_SHOW" xs12 sm6 pl-2>
                        <v-btn outline :href="parameters.SECOND_BUTTON_LINK" color="#2f2e2e" block>
                            <v-icon class="pr-2" color="#007DC6">{{parameters.SECOND_BUTTON_ICON}}</v-icon>
                            {{parameters.SECOND_BUTTON_TITLE}}
                        </v-btn>
                    </v-flex>
                </v-layout>

            </v-flex>
            <v-flex v-if="parameters.SHOW_CONTACTS" md12 lg5 pt-4 pl-3>
                <div class="footer-infoline">{{parameters.TITLE_CONTACTS}}</div>
                <div class="footer-phones">
                    <div v-for="count in parameters.COUNT_NUMBERS" :class="parameters.SETTINGS_NUMBERS.ICONS[count-1]">
                        <a :href="parameters.SETTINGS_NUMBERS.NUMBERS[count-1]">{{parameters.SETTINGS_NUMBERS.VIEW_NUMBERS[count-1]}}</a>
                    </div>
                </div>
                <div class="footer-work-time" v-html="parameters.SCHEDULE_CONTACTS"></div>
                <div v-if="parameters.SHOW_MENU === 'Y'" class="footer-hrefs">
                    <a v-for="(item, i) in menuFooter" :key="i" :href="item.href">
                        {{item.text}}
                    </a>
                </div>
            </v-flex>
        </v-layout>
        <v-layout row wrap px-3>
            <v-flex xs12>
                <LineDotts color="#ececec"/>
            </v-flex>
        </v-layout>
        <v-layout wrap row pa-4 pt-4>
            <v-flex md12 lg10 pr-1>
                <div class="footer-bottom-text" v-html="parameters.TEXT_COPYRIGHT"></div>
            </v-flex>
            <v-flex md12 lg2>
                <v-layout align-center justify-center row fill-height>
                    <v-flex xs12 align-center text-center>
                        <img :src="parameters.IMG_FOOTER" alt="" class="footer-img">
                    </v-flex>
                </v-layout>
            </v-flex>
        </v-layout>
    </v-container>
</template>

<script src="./script.js"></script>

<style scoped lang="scss" src="./styles.scss"></style>
