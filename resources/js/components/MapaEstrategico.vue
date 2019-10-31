<template>
  <div id="relation" class="w-100 box border"></div>
</template>

<script>
export default {
  props: {
    datos: Array
  },
  data() {
    return {
      data: [
        {
          // this is the information needed for the headers of the bands
          key: "_BANDS",
          category: "Bands",
          itemArray: [
            { text: "Zero" },
            { text: "One" },
            { text: "Two" },
            { text: "Three" },
            { text: "Four" },
            { text: "Five" }
          ]
        },
        // these are the regular nodes in the TreeModel
        { key: "root", text: "root", color: "pink" },
        { key: "oneB", text: "oneB", parent: "root", color: "red" },
        { key: "twoA", text: "twoA", parent: "oneB", color: "yellow" },
        { key: "twoC", text: "twoC", parent: "root", color: "pink" },
        { key: "threeC", text: "threeC", parent: "twoC", color: "pink" },
        { key: "threeD", text: "threeD", parent: "twoC", color: "pink" },
        { key: "fourB", text: "fourB", parent: "threeD", color: "pink" },
        { key: "fourC", text: "fourC", parent: "twoC", color: "pink" },
        { key: "fourD", text: "fourD", parent: "fourB", color: "pink" },
        { key: "twoD", text: "twoD", parent: "root", color: "pink" }
      ]
    };
  },
  mounted() {
    // this controls whether the layout is horizontal and the layer bands are vertical, or vice-versa:
    var HORIZONTAL = false; // this constant parameter can only be set here, not dynamically

    // Perform a TreeLayout where commitLayers is overridden to modify the background Part whose key is "_BANDS".
    function BandedTreeLayout() {
      go.TreeLayout.call(this);
      this.layerStyle = go.TreeLayout.LayerUniform; // needed for straight layers
    }
    go.Diagram.inherit(BandedTreeLayout, go.TreeLayout);

    BandedTreeLayout.prototype.commitLayers = function(layerRects, offset) {
      // update the background object holding the visual "bands"
      var bands = this.diagram.findPartForKey("_BANDS");
      if (bands) {
        var model = this.diagram.model;
        bands.location = this.arrangementOrigin.copy().add(offset);

        // make each band visible or not, depending on whether there is a layer for it
        for (var it = bands.elements; it.next(); ) {
          var idx = it.key;
          var elt = it.value; // the item panel representing a band
          elt.visible = idx < layerRects.length;
        }

        // set the bounds of each band via data binding of the "bounds" property
        var arr = bands.data.itemArray;
        for (var i = 0; i < layerRects.length; i++) {
          var itemdata = arr[i];
          if (itemdata) {
            model.setDataProperty(itemdata, "bounds", layerRects[i]);
          }
        }
      }
    };
    // end BandedTreeLayout

    var G = go.GraphObject.make;
    var myDiagram = G(go.Diagram, "relation", {
      layout: G(
        BandedTreeLayout, // custom layout is defined above
        {
          angle: HORIZONTAL ? 0 : 90,
          arrangement: HORIZONTAL
            ? go.TreeLayout.ArrangementVertical
            : go.TreeLayout.ArrangementHorizontal
        }
      ),
      "undoManager.isEnabled": true
    });
    // myDiagram.scale = 1.5;
    myDiagram.nodeTemplate = G(
      go.Node,
      go.Panel.Auto,
      G(
        go.Shape,
        "RoundedRectangle",
        { strokeWidth: 3, width: 150, height: "auto" },
        new go.Binding("fill", "color")
      ),
      G(
        go.TextBlock,
        {
          margin: 10,
          stroke: "white",
          overflow: go.TextBlock.OverflowClip,
          width: 120
        },
        new go.Binding("text")
      )
    );

    myDiagram.nodeTemplateMap.add(
      "Bands",
      G(go.Part, "Position", new go.Binding("itemArray"), {
        isLayoutPositioned: false, // but still in document bounds
        locationSpot: new go.Spot(
          0,
          0,
          HORIZONTAL ? 0 : 16,
          HORIZONTAL ? 16 : 0
        ), // account for header height
        layerName: "Background",
        pickable: false,
        selectable: false,
        itemTemplate: G(
          go.Panel,
          HORIZONTAL ? "Vertical" : "Horizontal",
          new go.Binding("position", "bounds", function(b) {
            return b.position;
          }),
          G(
            go.TextBlock,
            {
              angle: HORIZONTAL ? 0 : 270,
              textAlign: "center",
              wrap: go.TextBlock.None,
              font: "bold 11pt sans-serif",
              stroke: "white",
              margin: 5,
              background: G(go.Brush, "Linear", {
                0: "#343a40",
                1: go.Brush.darken("#343a40")
              })
            },
            new go.Binding("text"),
            // always bind "width" because the angle does the rotation
            new go.Binding("width", "bounds", function(r) {
              return HORIZONTAL ? r.width : r.height;
            })
          ),
          G(
            go.Shape,
            { stroke: null, strokeWidth: 0 },
            new go.Binding("desiredSize", "bounds", function(r) {
              return r.size;
            }),
            new go.Binding("fill", "itemIndex", function(i) {
              return i % 2 == 0 ? "whitesmoke" : go.Brush.darken("whitesmoke");
            }).ofObject()
          )
        )
      })
    );
    myDiagram.linkTemplate = G(go.Link, G(go.Shape)); // simple black line, no arrowhead needed
    var nodeDataArray = this.datos;
    myDiagram.model = new go.TreeModel(nodeDataArray);
  }
};
</script>

<style>
.box {
  width: 400px;
  height: 500px;
}
</style>