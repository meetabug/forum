<script>
    import Replies from '../components/Replies';
    import SubscribeButton from '../components/SubscribeButton';

    export default {
        props: ['thread'],

        components: {Replies, SubscribeButton},

        data() {
            return {
                repliesCount: this.thread.replies_count,
                locked: this.thread.locked,
                editing: false,
                title: this.thread.title,
                body: this.thread.body,
                form: {
                    title: this.thread.title,
                    body: this.thread.body
                }
            };
        },

        methods: {
            toggleLock() {
                axios[this.locked ? 'delete' : 'post']('/locked-threads/' + this.thread.slug);

                this.locked = !this.locked;
            },

            update() {
                axios.patch('/threads/' + this.thread.channel.slug + '/' + this.thread.slug, {
                    title: this.form.title,
                    body: this.form.body
                }).then(() => {
                    this.editing = false;
                    this.title = this.form.title;
                    this.body = this.form.body;

                    flash('Your thread has been updated.');
                });
            },

            resetForm() {
                this.form.title = this.thread.title;
                this.form.body = this.thread.body;

                this.editing = false;
            }

        }
    }
</script>