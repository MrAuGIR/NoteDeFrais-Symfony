/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
//import de react
import React from 'react';
import ReactDom from 'react-dom';
import { HashRouter, Route, Switch } from 'react-router-dom';
import NavBar from './js/components/NavBar';
import NavSide from './js/components/NavSide';
import CategoriesPage from "./js/pages/CategoriesPages";

// any CSS you import will output into a single css file (app.css in this case)
import './styles/app.scss';



const App = () =>{
    return(
         
        <HashRouter>
            <NavBar />
            <main className="main">
                <div className="row">
                    <div className="col-12 col-md-3 col-lg-2 my-0 my-0">
                        <NavSide />
                    </div>
                    <div className="col-12 col-md-7 col-lg-8 my-0 my-0">
                        <div className="row">
                            <div className="container">
                                <Switch>
                                    <Route path="/categories" component={CategoriesPage} />
                                </Switch>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </HashRouter>
    )
}

const rootElement = document.querySelector("#App");
ReactDom.render(<App />, rootElement);