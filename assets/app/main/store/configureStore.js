import {createStore, compose, applyMiddleware} from 'redux';
import logger from 'redux-logger';
import thunk from 'redux-thunk';
import rootReducer from './reducers';

const composeEnhancer = window.__REDUX_DEVTOOLS_EXTENSION_COMPOSE__ || compose;

const configureStore = () => createStore(
    rootReducer,
    composeEnhancer(applyMiddleware(thunk, logger)),
);

export const store = configureStore();
export default configureStore;