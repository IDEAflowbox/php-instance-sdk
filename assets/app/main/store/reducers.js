import { combineReducers } from 'redux';
import {authorization} from '../../modules/Home/home-reducer';

const rootReducer = combineReducers({
    authorization
});

export default rootReducer;