"use strict";
var InMemoryDataService = (function () {
    function InMemoryDataService() {
    }
    InMemoryDataService.prototype.createDb = function () {
        var heroes = [
            { id: 11, nom: 'Mr. Nice', mail: 'Nice@ecam.be' },
            { id: 12, nom: 'Narco', mail: 'Nice@ecam.be' },
            { id: 13, nom: 'Bombasto', mail: 'Nice@ecam.be' },
            { id: 14, nom: 'Celeritas', mail: 'Nice@ecam.be' },
            { id: 15, nom: 'Magneta', mail: 'Nice@ecam.be' },
            { id: 16, nom: 'RubberMan', mail: 'Nice@ecam.be' },
            { id: 17, nom: 'Dynama', mail: 'Nice@ecam.be' },
            { id: 18, nom: 'Dr IQ', mail: 'Nice@ecam.be' },
            { id: 19, nom: 'Magma', mail: 'Nice@ecam.be' },
            { id: 20, nom: 'Tornado', mail: 'Nice@ecam.be' }
        ];
        return { heroes: heroes };
    };
    return InMemoryDataService;
}());
exports.InMemoryDataService = InMemoryDataService;
/*
Copyright 2016 Google Inc. All Rights Reserved.
Use of this source code is governed by an MIT-style license that
can be found in the LICENSE file at http://angular.io/license
*/ 
//# sourceMappingURL=in-memory-data.service.js.map