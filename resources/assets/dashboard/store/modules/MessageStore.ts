/** @format */

import { Action, Module, Mutation, VuexModule, getModule } from 'vuex-module-decorators';

import store from '@/dashboard/store/index';
import { MessageModel } from '@/dashboard/store/models/MessageModel';

@Module({
    dynamic: true,
    name: 'moduleMessage',
    namespaced: true,
    stateFactory: true,
    store,
    preserveState: null !== localStorage.getItem('vuex'),
})
class MessageStore extends VuexModule implements MessageModel {
    public payload = [];
    public detonate = 0;
    public body = '';
    public createdAt = '';
    public targetId = '';
    public in = false;
    public out = true;
    public viewed = false;
    public viewedAt = '';
    public edited = false;
    public editedAt = null;
    public discussion = null;
    public type = '';

    get getPayload() {
        return this.payload;
    }

    get getDetonate() {
        return this.detonate;
    }

    @Action({ commit: 'mutateDetonator' })
    public async initMessage(payload) {
        this.mutateMessage(payload);
        // await axios.post('/noix/init-msg', payload);
    }

    @Mutation
    private mutateMessage(payload: MessageModel) {
        this.body = payload.body;
        this.createdAt = payload.createdAt;

        if (this.payload[payload.targetId]) {
            // this.payload = { ...this.payload[payload.targetId], ...payload };
            // Vue.set(this.payload, payload.targetId, payload);
            this.payload[payload.targetId].unshift(payload);
        } else {
            // Vue.set(this.payload, payload.targetId, [payload]);
            this.payload[payload.targetId] = [payload];
            // this.payload = { ...this.payload, ...payload };
        }
    }

    @Mutation
    private mutateDetonator() {
        ++this.detonate;
    }
}

export const MessageModule = getModule(MessageStore);
