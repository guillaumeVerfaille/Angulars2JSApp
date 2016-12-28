import { Injectable }    from '@angular/core';
import { Headers, Http, URLSearchParams } from '@angular/http';

import 'rxjs/add/operator/toPromise';

import { Hero } from './hero';

@Injectable()
export class HeroService {

  private headers = new Headers({'Content-Type': 'application/x-www-form-urlencoded'});
  private heroesUrl = 'http://localhost/my_project/web/app_dev.php/api/auteur';  // URL vers l'API de symfony

  constructor(private http: Http) { }

  getHeroes(): Promise<Hero[]> { // cette fonction fait une requète GET pour récupérer tous les auteurs
        return this.http
            .get(this.heroesUrl)
            .toPromise()
            .then(response => response.json() as Hero)
            .catch(this.handleError);
    }

  getHero(id: number): Promise<Hero> { // cette fonction fait une requète GET en préçisant l'id de l'auteur que l'on souhaite récupérer
    const url = `${this.heroesUrl}/${id}`;
  return this.http.get(url)
    .toPromise()
    .then(response => response.json() as Hero)
    .catch(this.handleError);
  }

  delete(id: number): Promise<void> { //Cette fonction envoie une requète DELETE pour effacer les informations concernant l'auteur ciblé par son id 
    const url = `${this.heroesUrl}/${id}`;
    return this.http.delete(url, {headers: this.headers})
      .toPromise()
      .then(() => null)
      .catch(this.handleError);
  }

  create(nom: string,mail: string): Promise<Hero> { // Cette fonction envoi une requète POST qui permet de créer un ateur
    let form = new URLSearchParams();
        
        form.set('nom', nom);
        form.set('mail', mail);
        return this.http
            .post(this.heroesUrl, form.toString(), {headers: this.headers})
            .toPromise()
            .then(res => res.json())
            .catch(this.handleError);
  }

  update(hero: Hero): Promise<Hero> { // Cette fonction envoi une requète PUT qui permet de modifier les informations concernant un auteur
    let form = new URLSearchParams();

        form.set('id', hero.id.toString());
        form.set('nom', hero.nom);
        form.set('mail', hero.mail);

        return this.http
            .put(this.heroesUrl, form.toString(), {headers: this.headers})
            .toPromise()
            .then(res => res.json())
            .catch(this.handleError);
  }

  private handleError(error: any): Promise<any> {
    console.error('ERROR', error); // for demo purposes only
    return Promise.reject(error.message || error);
  }
}

/*
Copyright 2016 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/