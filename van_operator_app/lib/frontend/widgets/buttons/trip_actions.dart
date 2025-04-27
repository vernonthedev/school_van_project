import 'package:flutter/material.dart';
import '../../../backend/models/trip.dart';
import 'action_button.dart';

class TripActions extends StatelessWidget {
  final TripAssigned trip;

  const TripActions({super.key, required this.trip});

  @override
  Widget build(BuildContext context) {
    return Column(
      children: [
        if (trip.tripStatus == 'scheduled')
          actionButton('Start Trip', Icons.play_arrow, Colors.green, () {
            // Start trip logic
          }),
        if (trip.tripStatus == 'ongoing')
          Column(
            children: [
              actionButton('Make Stop', Icons.pause, Colors.orange, () {
                // stop logic
              }),
              const SizedBox(height: 12),
              actionButton('End Trip', Icons.stop, Colors.red, () {
                // End trip logic
              }),
            ],
          ),
        if (trip.tripStatus == 'completed' || trip.tripStatus == 'cancelled')
          actionButton('View Trip Report', Icons.description, Colors.blue, () {
            // View report logic
          }),
      ],
    );
  }
}
