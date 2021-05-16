import React from 'react';
import { Link, NavLink } from 'react-router-dom';

const NavSide = (props) => {
    return ( 
        <ul className="nav flex-column">
            <li className="nav-item">
                <NavLink className="nav-link" to="/categories" replace>Categories</NavLink>
            </li>
            <li className="nav-item">
                <NavLink className="nav-link" to="/ranges" replace>Barème</NavLink>
            </li>
        </ul>
     );
}
 
export default NavSide;