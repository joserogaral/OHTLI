import React from 'react';
import Foot from '../Footer/Foot';
import './Prodd.css';


class Prodd extends React.Component {
    constructor(props) {
        super(props);
        this.state = { };
    };

    
    render() { 
        return ( 
        <div>
            <div className='organizz'>
                <div className='ordi1'>
                    <div id="carouselExample" class="carousel slide">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="../images/products/beige/IMG_0369 copia.jpg" class="d-block w-100" alt="..."></img>
                            </div>
                            <div class="carousel-item">
                            <img src="../images/products/beige/IMG_0370 copia.jpg" class="d-block w-100" alt="..."></img>
                            </div>
                            <div class="carousel-item">
                            <img src="../images/products/beige/IMG_0371 copia.jpg" class="d-block w-100" alt="..."></img>
                            </div>
                            <div class="carousel-item">
                            <img src="../images/products/beige/IMG_0372 copia.jpg" class="d-block w-100" alt="..."></img>
                            </div>
                            <div class="carousel-item">
                            <img src="../images/products/beige/IMG_0537 copia.jpg" class="d-block w-100" alt="..."></img>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                </div>
                <div className='ordi2'>
                    <div>
                        <h3>Ruta</h3>
                        <h1>Nombre</h1>
                    </div>
                    <div className='ppnav'>
                        <p>
                            L'upcycling est la clé: <br></br>
                            Wave sont des sneakers trés confortables faites en mesh, un tissu entierement fabriqué avec du plastique post consommation et récupéré des oceans.<br></br><br></br>

                            - Corps: 90% Plastique recyclé post consommation et 10% plastique recyclés des oecans.<br></br>
                            - Application de couleur: Cactus avec un support de coton BIO.<br></br>
                            - Semelle intérieur: Liège.<br></br>
                            - Semelle Extérioure: EVA 100% recyclé.<br></br>
                            - Lacets: Plastiqué recyclé.<br></br><br></br>

                            De petits gestes comme choisir la pointure correcte font partie de l'attitude eco-responsable.<br></br><br></br>

                            Éviter les retiurs nous aide  à réduire l'emprente carbone.<br></br><br></br>

                            Prends ton temp, voici: .<br></br><br></br>

                            
                        </p>
                        <nav className="organix">
                            <a href="">notre guide infalible des tailles</a><br></br><br></br>
                        </nav> 
                    </div>
                    <div className='eerrtt'>
                        <div className='ppllddss'>
                            <label>Taille</label>
                            <select className='centrrrtz'>
                                <option value="XS" selected>XS</option>
                                <option value="S">S</option>
                                <option value="M">M</option>
                                <option value="L">L</option>
                            </select> 
                        </div>
                        <input className='larrr' value={1} type="number" id="" name="" min="1" max="10"/>
                        <button>Ajouter au  panier</button>
                    </div>
                </div>    
            </div>
            <Foot></Foot>
        </div>
         );
    }
}
 
export default Prodd;