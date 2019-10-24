<template>
    <div>
        <v-card v-for="item in items" id="banner-main" class="mb-3" flat>
            <v-img
                    fill-height
                    :src="item.background"
                    height="460px"
                    position="right center"
            >
                <v-container fluid fill-height>
                    <v-layout row wrap>
                        <v-flex md6 hidden-sm-and-down pa-5>
                            <div class="banner-title" v-if="item.title" v-html="item.title"></div>
                            <div class="banner-text" v-if="item.text" v-html="item.text"></div>
                            <template v-if="item.btnText">
                                <v-btn v-if="item.btnStyle==2" outline class="banner-btn ml-0 pa-4 pb-3" round
                                       color="#ffffff"
                                       :href="item.href" v-text="item.btnText"></v-btn>
                                <v-btn v-else class="banner-btn ml-0 pa-4 pb-3" round color="#f36f21" :href="item.href"
                                       v-text="item.btnText"></v-btn>
                            </template>
                        </v-flex>
                        <v-flex md6 sm12 justify-center align-center text-center>
                            <v-layout align-center justify-center row fill-height>
                                <v-flex xs12 align-center text-center>
                                    <img v-if="item.image" :src="item.image" :alt="item.title" class="banner-img">
                                </v-flex>
                            </v-layout>
                        </v-flex>
                    </v-layout>
                </v-container>
            </v-img>
            <v-layout row wrap hidden-md-and-up>
                <v-flex xs12 px-4 pt-1>
                    <div class="mobile-banner-title title-section bold" v-if="item.title" v-html="item.title"></div>
                    <div class="mobile-banner-text" v-if="item.text" v-html="item.text"></div>
                    <v-btn class="mobile-banner-btn btn--sosedi orange big" round color="#f36f21" :href="item.href" v-if="item.btnText"
                           v-text="item.btnText"></v-btn>
                </v-flex>
            </v-layout>
        </v-card>
    </div>
</template>

<script src="./script.js"></script>

<style lang="scss" src="./styles.scss" scoped></style>
