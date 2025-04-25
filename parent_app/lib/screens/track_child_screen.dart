import 'dart:async';
import 'package:flutter/material.dart';
import 'package:google_maps_flutter/google_maps_flutter.dart';
import 'package:firebase_database/firebase_database.dart';

class TrackChildScreen extends StatefulWidget {
  final Map<String, dynamic> arguments;

  const TrackChildScreen({super.key, required this.arguments});

  @override
  State<TrackChildScreen> createState() => _TrackChildScreenState();
}

class _TrackChildScreenState extends State<TrackChildScreen> {
  late GoogleMapController _mapController;
  static const LatLng _initialLocation =
      LatLng(0.3476, 32.5825); // Default location (Kampala)
  LatLng _vanLocation = _initialLocation;
  late String vanOperatorId;
  StreamSubscription<DatabaseEvent>? _locationSubscription;

  @override
  void initState() {
    super.initState();
    final args = widget.arguments;
    vanOperatorId = args['vanOperatorId']; // Get vanOperatorId from arguments
    _subscribeToVanLocation();
  }

  @override
  void dispose() {
    _locationSubscription?.cancel();
    super.dispose();
  }

  void _subscribeToVanLocation() {
    final databaseRef = FirebaseDatabase.instance.ref('vans/$vanOperatorId');

    _locationSubscription = databaseRef.onValue.listen((event) {
      final data = event.snapshot.value as Map<dynamic, dynamic>?;
      if (data != null) {
        final latitude = data['latitude'];
        final longitude = data['longitude'];

        if (latitude != null && longitude != null) {
          setState(() {
            _vanLocation = LatLng(latitude, longitude);
          });

          // Move the map camera to the updated van location
          _mapController.animateCamera(
            CameraUpdate.newLatLng(_vanLocation),
          );
        }
      }
    });
  }

  void _onMapCreated(GoogleMapController controller) {
    _mapController = controller;
  }

  void _zoomIn() {
    _mapController.animateCamera(CameraUpdate.zoomIn());
  }

  void _zoomOut() {
    _mapController.animateCamera(CameraUpdate.zoomOut());
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      backgroundColor: Colors.white,
      appBar: AppBar(
        title: const Text('Track Child', style: TextStyle(color: Colors.white)),
        backgroundColor: Theme.of(context).primaryColor,
      ),
      body: Stack(
        children: [
          GoogleMap(
            initialCameraPosition: CameraPosition(
              target: _vanLocation,
              zoom: 15,
            ),
            onMapCreated: _onMapCreated,
            markers: {
              Marker(
                markerId: const MarkerId('van'),
                position: _vanLocation,
                icon: BitmapDescriptor.defaultMarkerWithHue(
                    BitmapDescriptor.hueAzure),
                infoWindow: const InfoWindow(title: 'Van Location'),
              ),
            },
            myLocationEnabled: true,
            zoomControlsEnabled: false,
          ),
          Positioned(
            top: 16,
            right: 16,
            child: Column(
              children: [
                _zoomButton(Icons.add, _zoomIn),
                const SizedBox(height: 8),
                _zoomButton(Icons.remove, _zoomOut),
              ],
            ),
          ),
        ],
      ),
    );
  }

  Widget _zoomButton(IconData icon, VoidCallback onPressed) {
    return Container(
      decoration: const BoxDecoration(
        color: Colors.white,
        shape: BoxShape.circle,
        boxShadow: [
          BoxShadow(
            color: Colors.black26,
            spreadRadius: 1,
            blurRadius: 3,
          ),
        ],
      ),
      child: IconButton(
        icon: Icon(icon),
        onPressed: onPressed,
      ),
    );
  }
}
