import React from 'react';
import Foot from '../Footer/Foot';
import './Carrousel.css';

class Carrosuel extends React.Component {
    constructor(props) {
        super(props);
        this.state = { 
            DResp: false,
            DDBD:[]
         }
    }

    UpDate(){

        fetch("http://localhost/OHTLI0624/WebService/Carru/carru.php")
        .then(Resp=>Resp.json())
        .then((DResp)=>{
            console.log(DResp)
            this.setState({DResp:true, DDBD:DResp})
        })
        .catch(console.log)

    }
    componentDidMount(){
        this.UpDate();
    }

    
    render() { 

        const{DDBD}=this.state;

        return ( 
<div>
        <div className='carr'>  
            <div id="carouselExampleDark" class="carousel carousel-dark slide">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner" rounded>

                {  
                    DDBD.map(   
                        (DDBDDz)=>(
                    
                            <div class="carousel-item active" data-bs-interval="10000" >
                                    <img src={DDBDDz.Imglk} class="d-block w-100" alt="..."></img>
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>Second slide label</h5>
                                    <p>Some representative placeholder content for the second slide.</p>
                                </div>
                            </div>     
                      
                      )
                      )}
                    


                    
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
        <Foot></Foot>
</div>
         );
    }
}
 
export default Carrosuel;