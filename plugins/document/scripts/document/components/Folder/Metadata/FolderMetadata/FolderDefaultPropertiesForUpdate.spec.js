/*
 * Copyright (c) Enalean, 2019 - present. All Rights Reserved.
 *
 * This file is a part of Tuleap.
 *
 * Tuleap is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * Tuleap is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Tuleap. If not, see <http://www.gnu.org/licenses/>.
 */

import { shallowMount } from "@vue/test-utils";
import { createStoreMock } from "@tuleap-vue-components/store-wrapper.js";
import localVue from "../../../../helpers/local-vue.js";
import FolderDefaultPropertiesForUpdate from "./FolderDefaultPropertiesForUpdate.vue";

describe("FolderDefaultPropertiesForUpdate", () => {
    let default_property, state, store;
    beforeEach(() => {
        state = {
            is_item_status_metadata_used: false
        };

        const store_options = { state };

        store = createStoreMock(store_options);

        default_property = (props = {}) => {
            return shallowMount(FolderDefaultPropertiesForUpdate, {
                localVue,
                propsData: { ...props },
                mocks: { $store: store }
            });
        };
    });

    it(`Given recursion option is updated Then the props used for document creation is updated`, () => {
        const wrapper = default_property({
            currentlyUpdatedItem: {
                id: 123,
                title: "My title",
                description: "My description",
                owner: {
                    id: 102
                },
                metadata: [
                    {
                        short_name: "status",
                        list_value: [
                            {
                                id: 103
                            }
                        ]
                    }
                ],
                status: {
                    value: "rejected",
                    recursion: "none"
                }
            }
        });

        store.state.is_item_status_metadata_used = true;

        wrapper.vm.recursion_option = "all_items";

        expect(
            wrapper.find("[data-test=document-folder-default-properties-container]").exists()
        ).toBeTruthy();
        expect(wrapper.vm.currentlyUpdatedItem.status.recursion).toEqual("all_items");
    });

    it(`Default properties are not displayed if project does not use status`, () => {
        const wrapper = default_property({
            currentlyUpdatedItem: {}
        });

        expect(
            wrapper.find("[data-test=document-folder-default-properties-container]").exists()
        ).toBeFalsy();
    });
});