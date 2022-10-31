<x-layout>
    <x-slot name="title">Dhandy Hosen</x-slot>
    <section class="home">
    <div class="content-home blue">
            <div class="tahun50">
                <div class="list">
                    <div class="foto">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/profile.jpg') }}" alt="home 1" />
                    </div>
                </div>
                <div class="list">
                    
                <div class="desc">
                <div class="title">        
                    <h1>Hi, I'm Dhandy.</h1>
                </div>    
                        <p>A student that have an enthusiast on technology, a firm believer that our people can really contribute in this era with their amazing ideas to make a better future.</p>
                       
                        <p> I really do likes had team work with a people that have eagerness and enthusiasm. Because people with that type of integrity can take this country and people around to another step.</p>
                        <div class="button">
                        <a id="anchor" class="button" href="https://drive.google.com/file/d/12CM2rbg8WhT49WJR-XK24Gn2yNaImBOA/view?usp=sharing">
                            Check Out My CV</a>
                </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-home blue-2">
            <div class="tahun50">
                <div class="list">
                    <div class="desc">
                    <div class="title">  
                        <h2>Education</h2>
                    </div>

                        <p>Already graduate from CCIT FTUI and now been studying in Politeknik Negeri Jakarta. For more detail check out my education timeline.</p>
                        <div class="button">
                        <button  type ="button" onclick="window.location='{{ url('/education') }}'">Check Out</button>
                    </div>
                    </div>
                </div>

                <div class="list">
                    <div class="foto">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/study.jpg') }}" alt="home 2" />
                    </div>
                </div>
            </div>
        </div>

        <div class="content-home coklat">
            <div class="tahun50">
            <div class="list">
                    <div class="foto">
                        <img src="{{ \Illuminate\Support\Facades\URL::asset('/images/hold_phone.jpg') }}" alt="home 3" />
                    </div>
                </div>


                <div class="list">
                    <div class="desc">
                        <div class="title">
                        <h2>Contact</h2>
                    </div>

                        <p>As for now I'm looking oppurtunities for internship. Just contact me for collaboration and speaking engagement oppurtunities.</p>
                    <div class="button">
                        <button>Contact</button>
                    </div>
                    </div>
                </div>
            
            </div>
        </div>

        <div class="note">
             <br />
                
            </div>
</section>
   
</x-layout>