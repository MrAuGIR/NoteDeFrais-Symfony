/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
//import de react
import React from 'react';
import ReactDom from 'react-dom';
import { HashRouter } from 'react-router-dom';
import NavBar from './js/components/NavBar';

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';



const App = () =>{
    return(
         
        <HashRouter>
            <NavBar />
        </HashRouter>
    )
}

const rootElement = document.querySelector("#App");
ReactDom.render(<App />, rootElement);