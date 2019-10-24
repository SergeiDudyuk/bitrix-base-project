<template>
    <div class="AccordionList">
        <div class="AccordionList_title">
            {{list.title}}
        </div>
        <b></b>
        <v-expansion-panel class="AccordionList_list">
            <v-expansion-panel-content
                    class="AccordionList_list_content"
                    v-for="(item,i) in list.items"
                    :key="i"
            >
                <div class="AccordionList_list_title" slot="header">{{item.title}}</div>
                <v-card class="AccordionList_list_text">
                    <v-card-text>
                        {{item.text}}
                    </v-card-text>
                </v-card>
            </v-expansion-panel-content>
        </v-expansion-panel>
    </div>
</template>

<script src="./script.js"></script>
<style lang="scss" src="./styles.scss"></style>
