<template>
    <div class="contaienr mb-2">
        <div class="row">
            <router-link class="col-1" :to="{ name: 'user_notes', params: {userId: notification.publisher.id}}">
                <avatar-icon :user="notification.publisher"/>
            </router-link>
            <router-link class="col-11" :to="{ name: 'user_notes', params: {userId: notification.publisher.id}}"> 
                <!--{{ notiifcation.publisher.user_name }}-->
                {{ notification.publisher.user_name }}
            </router-link>
            
            
        </div>
        <div class="row">
        </div>
        <div>
            <div v-if="notification.favorite">
                {{ notification.publisher.user_name }}がお気に入りにしました。
                <slot name="favorite" :favorite="notification.favorite">
                    <note-component :note="getNote(notification.favorite.note_id)" @favorite="favorite" @unfavorite="unfavorite"/>
                </slot>
            </div>
            <div v-else-if="notification.comment">
                {{ notification.publisher.user_name }}がコメントしました。
                <slot name="comment" :comment="notification.comment">
                    <a-comment :comment="notification.comment" />
                </slot>
            </div>
            <div v-else>
                {{ notification.publisher.user_name }}がフォローしました。
                <slot name="follow" :publisher="notification.publisher">
                    <followee-component :user="notification.publisher" :me="user" @follow="follow" @unfollow="unfollow" />
                </slot>
                
            </div>
        </div>

    </div>
</template>
<script>
import AvatarIcon from '../atoms/AvatarIcon';
import NoteComponent from './NoteComponent';
import FolloweeComponent from './FolloweeComponent';
import Comment from './../molecules/Comment';
import { mapState, mapActions, mapGetters } from 'vuex';

export default {
    props: {
        notification: {
            type: Object,
            required: true
        }
    },
    components: {
        'avatar-icon': AvatarIcon,
        'followee-component': FolloweeComponent,
        'note-component': NoteComponent,
        'a-comment': Comment
    },
    computed: {
        ...mapState(['user']),
        getNote(){
            return (id) => {
                return this.$store.getters['getNoteById'](id);
            }
        }
    },
    methods: {
        follow(user){
            this.$store.dispatch('follow', user)
                .then((res)=>{
                    console.log(res);
                });
        },
        unfollow(user){
            this.$store.dispatch('unfollow', user)
                .then((res)=>{
                    console.log(res);
                });
        },

        favorite(noteId){
            this.$store.dispatch('favorite', noteId);
        },

        unfavorite(noteId){
            this.$store.dispatch('unfavorite', noteId);
        }

    }
}
</script>